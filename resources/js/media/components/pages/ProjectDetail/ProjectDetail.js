import React, { useState, useEffect } from 'react';
import { useParams } from 'react-router-dom';
import Pace from 'react-pace-progress'

import style from './ProjectDetail.css'

import Image from "./components/Image";
import JuniorInternet from "./components/JuniorInternet";

import Footer from "../Footer/Footer";
import SEO from "../../../../SEO/SEO";

const ProjectDetail = () => {
    const { slug } = useParams();
    const [project, setProject] = useState({loading: true});

    useEffect(() => {
        const fetchProject = async () => {
            const response = await fetch('/api/project/' + slug);
            const json = await response.json();
            setProject(json);
        };

        fetchProject();
    }, []);

    let img = '';
    switch (project.technology) {
        case 'react':
            img = '/media/img/react.svg';
            break;
        case 'react-laravel':
            img = '/media/img/react-laravel.png';
            break;
        case 'vue-laravel':
            img = '/media/img/vue-laravel.png';
            break;
        case 'livewire-laravel':
            img = '/media/img/livewire-laravel.png';
            break;
        case 'laravel':
            img = '/media/img/Laravel.png';
            break;
        case 'php':
            img = '/media/img/PHP-logo.svg';
            break;
        case 'wp':
            img = '/media/img/wordpress-logo.png';
            break;
    }

    let website_link = null;
    if (project.link !== null) {
        website_link = (<a href={project.link} target="_blank" rel="noopener norefferer" className={style.link}>Visit website</a>);
    }

	return (
		<div className={style.projectDetail}>
            {project.loading === true ? <div style={{zIndex: 3}}><Pace color="#27ae60" height="10px" /></div> : (
                <div>
                    <SEO title={`${project.title} / LiMix Media`} description={`${project.description.replace(/<[^>]+>/g, '').slice(0, 300)}...`} canonical={`https://limixmedia.com/projects/${project.slug}`} img={project.images.length > 0 ? `https://limixmedia.com/media${project.images[0].url}` : 'https://limixmedia.com/media/img/share.png'} />
                    <div className={style.first}>
                        <h1>{project.title}</h1>
                        <div className={style.left}>
                            <h2>Technologies used</h2>
                            <img src={img} alt="Technology used"/>
                        </div>
                        <div className={style.right}>
                            <p dangerouslySetInnerHTML={{__html: project.description}} />
                            {website_link}
                        </div>
                    </div>
                    {project.won !== null ? (
                        <JuniorInternet won={project.won} />
                    ) : ''}
                    {project.images.length > 0 ? (
                        <div className={style.second}>
                            <Image images={project.images} />
                        </div>
                    ) : ''}
                    <Footer />
                </div>
            )}
		</div>
	);

};

export default ProjectDetail;
