import React from 'react';
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import { faCircle } from "@fortawesome/free-solid-svg-icons";

import style from './Image.css';

class Image extends React.Component {
    constructor(props) {
        super(props);
        const idxStart = 0;
        this.state = {
            index: idxStart,
            width: 0
        };
    }

    getNextIndex(idx) {
        if (this.props.images !== undefined && idx >= this.props.images.length - 1) {
            return 0;
        }
        return idx + 1;
    }

    setIndexes(idx) {
        this.setState({
            index: idx,
            width: 0
        });
    }

    changeImage(id) {
        this.setIndexes(id);
        //resetovat interval
        clearInterval(this.state.interval);
        clearInterval(this.state.secondInterval);
        // opatovne spustit
        this.setState({
            interval: setInterval(() => {
                this.setIndexes(this.getNextIndex(this.state.index));
            }, 10000),
            secondInterval: setInterval(() => {
                document.querySelector("#color").style.width = (this.state.width + 1) + "%";
                this.setState({width: this.state.width + 1})
            }, 100)
        })
    }

    componentDidMount() {
        // spustit interval a ulozit ho do state aby som ho potom mohol resetovat
        this.setState({
            interval: setInterval(() => {
                this.setIndexes(this.getNextIndex(this.state.index));
            }, 10000),
            secondInterval: setInterval(() => {
                document.querySelector("#color").style.width = (this.state.width + 1) + "%";
                this.setState({width: this.state.width + 1})
            }, 100)
        })
    }

    componentWillUnmount() {
        clearInterval(this.state.interval);
        clearInterval(this.state.secondInterval);
    }

    render() {
        return (
            <div>
                <div id="color" className={style.color} />
                <img src={this.props.images[this.state.index].url} alt="image" />
                <div className={style.circle}>
                    {this.props.images.map((image, id) => {
                        return (<FontAwesomeIcon icon={faCircle} key={id} className={(this.state.index === id) ? style.active : ''} onClick={() => this.changeImage(id)} />)
                    })}
                </div>
            </div>
        );
    }
}

export default Image;
