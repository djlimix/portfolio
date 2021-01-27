import React  from 'react';
import { render } from 'react-dom';
import {
    BrowserRouter as Router,
    Switch,
    Route,
    NavLink
} from "react-router-dom";

import Home from "../Home/Home";
import About from "../About/About";
import Contact from "../Contact/Contact";
import Production from "../Production/Production";
import ScrollToTop from "../ScrollToTop/ScrollToTop";

import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faBars, faTimes } from "@fortawesome/free-solid-svg-icons";

import shared from '../../../../media/components/pages/Index/Index.css'
import style from './Index.css'
import classNames from 'classnames';

const logo = require('./logo.png');

const showMenu = () => {

    document.querySelector('#showMenu').classList.add(shared.hide);
    document.querySelector('#hideMenu').classList.remove(shared.hide);
    document.querySelector('.' + style.navigation).classList.add(shared.shown);
};

const hideMenu = () => {
    document.querySelector('#showMenu').classList.remove(shared.hide);
    document.querySelector('#hideMenu').classList.add(shared.hide);
    document.querySelector('.' + style.navigation).classList.remove(shared.shown);
};

function Index() {

    return (
        <div>
            <Router onUpdate={() => {window.scrollTo(0, 0)}}>
                <ScrollToTop toggleNavHandler={hideMenu} />
                <header className={window.location.pathname === "/" || window.location.pathname === "/about" ? style.zIndex : ''}>
                    <nav>
                        <FontAwesomeIcon icon={faBars} className={shared.bars} id="showMenu" onClick={showMenu} />
                        <FontAwesomeIcon icon={faTimes} className={classNames(shared.bars, shared.hide)} id="hideMenu" onClick={hideMenu} />
                        <ul className={classNames(style.navigation, shared.navigation)}>
                            <li className={classNames(style.logo, shared.logo)}>
                                <NavLink to="/"><img src={logo} /></NavLink>
                            </li>
                            <li>
                                <NavLink to="/" activeClassName={classNames(style.active, shared.active)} exact>Home</NavLink>
                            </li>
                            <li>
                                <NavLink to="/about" activeClassName={classNames(style.active, shared.active)}>About me</NavLink>
                            </li>
                            <li>
                                <NavLink to="/production" activeClassName={classNames(style.active, shared.active)}>Production</NavLink>
                            </li>
                            <li>
                                <a href="https://links.limix.eu" rel="nofollow norefferer" target="_blank">Links</a>
                            </li>
                            <li>
                                <a href="https://blog.limix.eu/" rel="nofollow norefferer" target="_blank">Blog</a>
                            </li>
                            <li>
                                <NavLink to="/contact" activeClassName={classNames(style.active, shared.active)}>Contact</NavLink>
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

const rootElement = document.getElementById("root");
render(<Index />, rootElement)
