import React, {Component} from 'react';

import style from './Home.css'

import SEO from "../../../../SEO/SEO";

const textArray = ['Self-taught', 'Young', 'Passionate', 'Responsible'];

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
    }

    componentDidUnmount() {
        clearInterval(this.timeout);
    }

    render() {
        let textThatChanges = textArray[this.state.textIdx % textArray.length];

        return (
            <div className={style.home}>
                <SEO title="LiMix Media - Young web developer" description="I'm Max, a 16-year-old backend developer who lives in Slovakia." canonical="https://limixmedia.com" img="https://limixmedia.com/media/img/share.png" />
                <h1>LiMix Media</h1>
                <h2><em>{textThatChanges}</em> back-end developer</h2>
            </div>
        )
    }
}

export default Home;
