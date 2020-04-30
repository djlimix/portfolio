import { useEffect } from 'react';
import { withRouter } from 'react-router-dom';
import ReactGA from "react-ga";
import style from "../Index/Index.css";

function ScrollToTop({ history, toggleNavHandler }) {

    useEffect(() => {
        const unlisten = history.listen((location) => {
            window.scrollTo(0, 0);
            toggleNavHandler();
            ReactGA.initialize('UA-163388035-2');
            ReactGA.pageview(location.pathname);
            if (window.location.pathname === "/" || window.location.pathname === "/about") {
                document.querySelector('header').classList.add(style.zIndex);
            } else {
                document.querySelector('header').classList.remove(style.zIndex);
            }
        });
        return () => {
            unlisten();
        }
    }, []);

    return (null);
}

export default withRouter(ScrollToTop);
