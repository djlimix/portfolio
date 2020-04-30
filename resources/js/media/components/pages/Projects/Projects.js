import React, { useState, useEffect } from 'react';
import {NavLink} from 'react-router-dom';
import Pace from 'react-pace-progress'

import style from './Projects.css'

import Footer from "../Footer/Footer";
import SEO from "../../../../SEO/SEO";

const Projects = () => {
    const [projects, setProjects] = useState({loading: true});

    useEffect(() => {
        const fetchProjects = async () => {
            const response = await fetch('/api/projects');
            const json = await response.json();
            setProjects(json)
        };

        fetchProjects();
    }, []);

    let elements = [];
    for(let i in projects) {

        let type = '';

        if (projects[i].type === "be") {
            type = 'Only BackEnd';
        } else {
            type = 'FrontEnd + BackEnd'
        }
        elements.push(<tr key={i}>
                        <td>
                            <NavLink to={`/projects/` + projects[i].slug}>{projects[i].title}</NavLink>
                        </td>
                        <td>
                            {type}
                        </td>
                        <td>
                            {projects[i].year}
                        </td>
                    </tr>)
    }

	return (
		<div className={style.projects}>
            <SEO title="My projects / LiMix Media" description="If you are interested in what projects I've done, check out this page." canonical="https://limixmedia.com/projects" img="https://limixmedia.com/media/img/share.png" />
            {projects.loading === true ? <Pace color="#27ae60" height="10px"/> : (
                <div>
                    <h1>My projects</h1>
                    <table className={style.table}>
                        <tbody>
                        {elements}
                        </tbody>
                    </table>
                </div>
            )}
            <div className={style.footer}>
                <Footer />
            </div>
		</div>
	);

};

export default Projects;
