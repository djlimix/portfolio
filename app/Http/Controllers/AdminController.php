<?php

namespace App\Http\Controllers;

use App\Article;
use App\Link;
use App\Production;
use App\Project;
use App\ProjectImage;
use App\Tag;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function getIndex() {
        return view('admin.index');
    }

    public function getArticles() {
        return view('admin.articles.show')
                ->withArticles(Article::all());
    }

    public function addArticle() {
        return view('admin.articles.add')
                ->withTags(Tag::all());
    }

    public function addArticlePost( Request $request ) {
        return ( new Article )->add($request);
    }

    public function editArticle( Article $article ) {
        return view('admin.articles.edit')
            ->withArticle($article)
            ->withTags(Tag::all());
    }

    public function editArticlePost( Article $article, Request $request ) {
        return ( new Article )->edit($article, $request);
    }

    public function deleteArticle( Article $article ) {
        $article->delete();
        return redirect()->route('admin.articles');
    }

    public function getProduction() {
        return view('admin.production.show')
                ->withProduction(Production::all());
    }

    public function addProduction() {
        return view('admin.production.add');
    }

    public function addProductionPost( Request $request ) {
        return ( new Production() )->add($request);
    }

    public function editProduction( Production $production ) {
        return view('admin.production.edit')
            ->withProduction($production);
    }

    public function editProductionPost( Production $production, Request $request ) {
        return ( new Production() )->edit($production, $request);
    }

    public function deleteProduction( Production $production ) {
        $production->delete();
        return redirect()->route('admin.production');
    }

    public function getProjects() {
        return view('admin.projects.show')
                ->withProjects(Project::all());
    }

    public function addProject() {
        return view('admin.projects.add');
    }

    public function addProjectPost( Request $request ) {
        return ( new Project() )->add($request);
    }

    public function editProject( Project $project ) {
        return view('admin.projects.edit')
            ->withProject($project);
    }

    public function editProjectPost( Project $project, Request $request ) {
        return ( new Project() )->edit($project, $request);
    }

    public function deleteProject( Project $project ) {
        return $project->deleteWithFolder($project);
    }

    public function getDjLinks() {
        return view('admin.links.show')
                ->withLinks(Link::whereFor('dj')->get());
    }

    public function getMediaLinks() {
        return view('admin.links.show')
                ->withLinks(Link::whereFor('media')->get());
    }

    public function addLink() {
        return view('admin.links.add')
                ->withType(\request()->getRequestUri() === '/admin/dj/links/add' ? 'dj' : 'media');
    }

    public function storeLink(Request $request, Link $link) {
        $this->validate($request, [
            'title' => ['required', 'string'],
            'for'   => ['required', 'regex:/^(dj|media)$/i'],
            'link'  => ['required', 'url']
        ]);

        $link->title = $request->title;
        $link->for   = $request->for;
        $link->url   = $request->link;

        $link->save();

        return redirect()->route($link->for === 'dj' ? 'admin.dj.links' : 'admin.media.links');
    }

    public function editLink(Link $link) {
        return view('admin.links.add')
                ->withLink($link);
    }

    public function updateLink(Request $request, Link $link) {
        $link->update($request->all());

        return redirect()->route($link->for === 'dj' ? 'admin.dj.links.edit' : 'admin.media.links.edit', $link);
    }

    public function deleteLink(Link $link) {
        $link->clicks()->delete();
        $link->delete();

        return redirect()->route($link->for === 'dj' ? 'admin.dj.links' : 'admin.media.links');
    }
}
