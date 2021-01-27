import React, {Component} from 'react';

import shared from '../../../../media/components/pages/Home/Home.css'
import style from './Home.css'
import classNames from 'classnames';

import SEO from "../../../../SEO/SEO";

const textArray = ['DJ', 'LJ'];
const videoArray = ['bg1.mp4', 'bg2.mp4', 'bg3.mp4', 'bg4.mp4'];

class Home extends Component {
    constructor() {
        super();
        this.state = { textIdx: 0 };
    }

    componentDidMount() {
        this.timeout = setInterval(() => {
            let currentIdx = this.state.textIdx;
            this.setState({ textIdx: currentIdx + 1 });
        }, 1500);
        const video = localStorage.getItem('video');

        if (video === null) {
            localStorage.setItem('video', '1');
        }
        if (+video > videoArray.length) {
            localStorage.setItem('video', '1');
        }

        document.querySelector('video').src = '/dj/video/' + videoArray[+localStorage.getItem('video') - 1];
        document.querySelector('video').volume = .2;
    }

    componentWillUnmount() {
        clearInterval(this.timeout);
        localStorage.setItem('video', (+localStorage.getItem('video') + 1));
    }

    render() {
        let textThatChanges = textArray[this.state.textIdx % textArray.length];

        window.addEventListener('unload', (event) => {
            // localStorage.setItem('video', (+localStorage.getItem('video') + 1));
        });

        return (
            <div className={classNames(style.home, shared.home)}>
                <SEO title="DJ LiMix" description="DJ LiMix is young DJ who loves all types of house music, but can also play an commercial set for your party." canonical="https://dj.limix.eu" />
                <h1>DJ LiMix</h1>
                <h2><em>{textThatChanges}</em> for your party</h2>
                <video autoPlay loop>Your browser does not support videos.</video>
            </div>
        )
    }
}

export default Home;
