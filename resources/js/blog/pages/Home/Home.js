import React, { useState, useEffect } from 'react';
import {Link} from 'react-router-dom';
import Pace from 'react-pace-progress'

import style from './Home.css'

import Footer from "../../components/Footer/Footer";
import ArticleComponent from "../../components/ArticleComponent/ArticleComponent";
import SEO from "../../../SEO/SEO";

const Home = ({ formatDate }) => {
    const [articles, setArticles] = useState({loading: true});

    useEffect(() => {
        const fetchArticles = async () => {
            const response = await fetch('/api/articles');
            const json = await response.json();
            setArticles(json)
        };

        fetchArticles();
    }, []);

    let featuredArticle = '';
    if (articles.featured !== undefined) {
        featuredArticle = (
            <Link className={style.featuredArticle} to={articles.featured.slug}>
                <time className={style.time} dateTime={articles.featured.created_at}>Published on {formatDate(new Date(articles.featured.created_at))}</time>
                <img src={articles.featured.bg} alt={articles.featured.title}/>
                <span className={style.title}>{articles.featured.title}</span>
            </Link>
        );
    }

    let articles_element = [];
    for (let i in articles.other) {
        articles_element.push(<ArticleComponent bg={articles.other[i].bg} dateTime={articles.other[i].created_at} dateTimeText={`Published on ${formatDate(new Date(articles.other[i].created_at))}`} title={articles.other[i].title} url={articles.other[i].slug} key={i} />)
    }

    return (
		<div className={style.home}>
			<SEO title="Max's blog" description="Welcome on my blog, where I (sometimes) write articles about my life." canonical="https://blog.limix.eu/" />
            <h1>Max's blog</h1>
            {articles.loading === true ? <Pace color="#27ae60" height="10px"/> : (
                <>
                    {featuredArticle}
                    <div className={style.articles}>
                        {articles_element}
                    </div>
                </>
            )}
            <Footer />
		</div>
	);

};

export default Home;
