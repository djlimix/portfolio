import React from 'react';
import { render } from 'react-dom';
import {
    BrowserRouter as Router,
    Switch,
    Route,
    Link
} from "react-router-dom";

import Home from "../Home/Home";
import Article from "../Article/Article";
import Tag from "../Tag/Tag";
import ScrollToTop from "../../components/ScrollToTop/ScrollToTop";

import style from './Index.css';

function Index() {
    return (
        <div>
            <Router onUpdate={() => {window.scrollTo(0, 0)}}>
                <ScrollToTop />
                <Switch>
                    <Route path="/tag/:slug">
                        <Tag formatDate={formatDate} />
                    </Route>
                    <Route path="/" exact>
                        <Home formatDate={formatDate} />
                    </Route>
                    <Route path="/:slug">
                        <Article formatDate={formatDate} />
                    </Route>
                </Switch>
            </Router>
        </div>
    );
}

export default Index;


const nth = (d) => {
    if (d > 3 && d < 21) return 'th';
    switch (d % 10) {
        case 1:  return "st";
        case 2:  return "nd";
        case 3:  return "rd";
        default: return "th";
    }
}

const formatDate = (date) => {
    const months = ["January", "February", "March","April", "May", "June", "July", "August", "September", "October", "November", "December"];
    return (date.getDate()) + nth(date.getDate()) + " " + months[date.getMonth()] + " " + date.getFullYear();
}

const rootElement = document.getElementById("root");
render(<Home formatDate={formatDate} />, rootElement)
