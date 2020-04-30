import React, { useState, useEffect } from 'react';
import { useParams, Link } from 'react-router-dom';
import Pace from 'react-pace-progress'

import Footer from "../../components/Footer/Footer";
import ArticleComponent from "../../components/ArticleComponent/ArticleComponent";
import GoHome from "../../components/GoHome/GoHome";
import SEO from "../../../SEO/SEO";

import style from './Tag.css'

const Tag = ({ formatDate }) => {

    const { slug } = useParams();
    const [tag, setTag] = useState({loading: true});

    useEffect(() => {
        const fetchTag = async () => {
            const response = await fetch('/api/tag/' + slug);
            const json = await response.json();
            setTag(json);
        };

        fetchTag();
    }, []);

    let articles = [];
    for (let i in tag.articles) {
        articles.push(<ArticleComponent bg={tag.articles[i].bg} dateTime={tag.articles[i].created_at} dateTimeText={`Published on ${formatDate(new Date(tag.articles[i].created_at))}`} title={tag.articles[i].title} url={`/${tag.articles[i].slug}`} key={i} />)
    }

	return (
		<div className={style.home}>
            {tag.loading === true ? <Pace color="#27ae60" height="10px"/> : (
                <>
                    <SEO title={`#${tag.title}`} description={`All articles that have ${tag.title} tag`} canonical={`https://blog.limix.eu/tag/` + slug} />
                    <GoHome />
                    <h1>{tag.title}</h1>
                    <div className={style.articles}>
                        <div className={style.articles}>
                            {articles}
                        </div>
                    </div>
                </>
            )}
            <Footer />
		</div>
	);

};

export default Tag;
