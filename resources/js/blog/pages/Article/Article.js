import React, { useState, useEffect } from 'react';
import { useParams, Link } from 'react-router-dom';
import Pace from 'react-pace-progress'

import style from './Article.css'

import Footer from "../../components/Footer/Footer";
import GoHome from "../../components/GoHome/GoHome";
import SEO from "../../../SEO/SEO";

const Article = ({ formatDate }) => {

    const { slug } = useParams();
    const [article, setArticle] = useState({loading: true});

    useEffect(() => {
        const fetchArticle = async () => {
            const response = await fetch('/api/article/' + slug);
            const json = await response.json();
            setArticle(json);
        };

        fetchArticle();
    }, []);

    let tags = [];
    for (let i in article.tags) {
        tags.push(<Link to={`/tag/${article.tags[i].slug}`}>{article.tags[i].title}</Link>)
    }

	return (
		<div className={style.article}>
            {article.loading === true ? <Pace color="#27ae60" height="10px"/> : (
                <>
                    <SEO title={article.article} description={`${article.text.replace(/<[^>]+>/g, '').slice(0, 300)}...`} canonical={`https://blog.limix.eu/` + slug} img={article.bg} />
                    <div className={style.coverImage}>
                        <img src={article.bg} alt={article.title}/>
                        <GoHome />
                        <time className={style.time}  dateTime={article.created_at}>Published on {formatDate(new Date(article.created_at))}</time>
                    </div>
                    <div className={style.content}>
                        <h1 className={style.heading}>{article.title}</h1>
                        <div className={style.textContent}>
                            <p dangerouslySetInnerHTML={{__html: article.text.replace('<br>', '<br><br>')}} />
                            <div className={style.tags}>
                                {tags}
                            </div>
                        </div>
                    </div>
                </>
            )}
            <Footer />
        </div>
	);

};

export default Article;
