import React, { useState, useEffect } from 'react';
import Pace from 'react-pace-progress'

import Footer from "../Footer/Footer";
import SEO from "../../../../SEO/SEO";

import shared from '../../../../media/components/pages/About/About.css'
import style from './About.css'
import classNames from 'classnames';

const About = () => {
    const [feed, setFeed] = useState({loading: true});

    useEffect(() => {
        const fetchFeed = async () => {
            const response = await fetch('/api/ig');
            const json = await response.json();
            setFeed(json)
        };

        fetchFeed();
    }, []);

    let elements = [];
    for(let i in feed) {
        elements.push(<a href={feed[i].link} className={style.imageLink} target="_blank" rel="noopener noreferrer">
            <img src={feed[i].src} alt={feed[i].text} key={i}/>
            <span>{feed[i].text}</span>
        </a>)
    }

    return (
        <div>
            <SEO title="About / DJ LiMix" description="All you need to know about me, DJ LiMix" canonical="https://dj.limix.eu/about" />
            <div className={classNames(style.first, shared.first)}>
                <div className={classNames(style.img, shared.img)}>
                    <img src="/dj/img/me.png" alt="photo of me"/>
                </div>
                <div className={classNames(style.description, shared.description)}>
                    <h1>DJ LiMix</h1>
                    <p>Hey, I’m Max! I’m a DJ and an LJ.</p>
                    <p>My story begins when I was on Alan Walker concert, where I got a CD with yearmix from 2 Slovak DJs. After listening to it, I immediately fell in love with EDM.</p>
                    <p>Nowadays, I DJ at parties on our dorm, but also on many balls in Slovakia. I also work as an LJ in local club in my town.</p>
                </div>
            </div>
            <div className={classNames(style.second, shared.second)}>
                {feed.loading === true ? <Pace color="#27ae60" height="10px"/> : (
                    <div>
                        {elements}
                        <a href="https://instagram.com/totendjzacky/" target="_blank" rel="noopener norefferer" className={style.link}>More photos</a>
                    </div>
                )}
            </div>
            <Footer/>
        </div>
    );

};

export default About;
