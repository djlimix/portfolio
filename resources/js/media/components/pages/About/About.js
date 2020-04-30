import React from 'react';

import style from './About.css'

import ProgressBar from "./components/ProgressBar";
import Footer from "../Footer/Footer";
import SEO from "../../../../SEO/SEO";

const About = () => {

    return (
        <div className={style.about}>
            <SEO title="About / LiMix Media" description="Anything, you want to know about me, can be found here," canonical="https://limixmedia.com/about" img="https://limixmedia.com/media/img/share.png" />
            <div className={style.first}>
                <div className={style.img}>
                    <img src="/media/img/me.png" alt="photo of me"/>
                </div>
                <div className={style.description}>
                    <h1>Max Csank</h1>
                    <p>Hey there! I’m Max and you are probably wondering how you got to my website.</p>
                    <p>You could be, for instance, looking for a backend developer. Or you were just procrastinating.</p>
                    <p>If you were looking for a backend developer, then welcome here.</p>
                    <p>If not, then please, do what you should be doing, it’s (mostly) for your own personal good.</p>
                </div>
            </div>
            <div className={style.second}>
                <h1>Skills</h1>
                <ProgressBar lang="PHP" />
                <ProgressBar lang="MySQL" />
                <ProgressBar lang="Laravel" />
                <ProgressBar lang="React" />
                <ProgressBar lang="HTML" />
                <ProgressBar lang="CSS" />
                <ProgressBar lang="English" />
            </div>
            <Footer/>
        </div>
    );

};

export default About;
