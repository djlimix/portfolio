import React  from 'react';
import ReactDOM from 'react-dom';
import {
    BrowserRouter as Router,
    Switch,
    Route,
    NavLink
} from "react-router-dom";

import Home from "../Home/Home";
import About from "../About/About";
import ScrollToTop from "../ScrollToTop/ScrollToTop";
import Production from "../Production/Production";

import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faBars, faTimes } from "@fortawesome/free-solid-svg-icons";

import style from './Index.css'
import Contact from "../Contact/Contact";

const showMenu = () => {

    document.querySelector('#showMenu').classList.add(style.hide);
    document.querySelector('#hideMenu').classList.remove(style.hide);
    document.querySelector('.' + style.navigation).classList.add(style.shown);
};

const hideMenu = () => {
    document.querySelector('#showMenu').classList.remove(style.hide);
    document.querySelector('#hideMenu').classList.add(style.hide);
    document.querySelector('.' + style.navigation).classList.remove(style.shown);
};

function Index() {

    return (
        <div>
            <Router onUpdate={() => {window.scrollTo(0, 0)}}>
                <ScrollToTop toggleNavHandler={hideMenu} />
                <header className={window.location.pathname === "/" || window.location.pathname === "/about" ? style.zIndex : ''}>
                    <nav>
                        <FontAwesomeIcon icon={faBars} className={style.bars} id="showMenu" onClick={showMenu} />
                        <FontAwesomeIcon icon={faTimes} className={`${style.bars} ${style.hide}`} id="hideMenu" onClick={hideMenu} />
                        <ul className={style.navigation}>
                            <li className={style.logo}>
                                <NavLink to="/">DJ LiMix</NavLink>
                            </li>
                            <li>
                                <NavLink to="/" activeClassName={style.active} exact>Home</NavLink>
                            </li>
                            <li>
                                <NavLink to="/about" activeClassName={style.active}>About me</NavLink>
                            </li>
                            <li>
                                <NavLink to="/production" activeClassName={style.active}>Production</NavLink>
                            </li>
                            <li>
                                <a href="https://linktr.ee/totendjzacky/" rel="nofollow norefferer" target="_blank">Links</a>
                            </li>
                            <li>
                                <a href="https://blog.limix.eu/" rel="nofollow norefferer" target="_blank">Blog</a>
                            </li>
                            <li>
                                <NavLink to="/contact" activeClassName={style.active}>Contact</NavLink>
                            </li>
                        </ul>
                    </nav>
                </header>
                <Switch>
                    <Route path="/about" exact>
                        <About />
                    </Route>
                    <Route path="/production" exact>
                        <Production />
                    </Route>
                    <Route path="/contact" exact>
                        <Contact />
                    </Route>
                    <Route path="/" exact>
                        <Home />
                    </Route>
                </Switch>
            </Router>
        </div>
    );
}

export default Index;

if (document.getElementById('root')) {
    ReactDOM.render(<Index />, document.getElementById('root'));
}
