import { useEffect } from 'react';
import { withRouter } from 'react-router-dom';
import ReactGA from "react-ga";

function ScrollToTop({ history, toggleNavHandler }) {

    useEffect(() => {
        const unlisten = history.listen((location) => {
            window.scrollTo(0, 0);
            toggleNavHandler();
            ReactGA.initialize('UA-163388035-1');
            ReactGA.pageview(location.pathname);
        });
        return () => {
            unlisten();
        }
    }, []);

    return (null);
}

export default withRouter(ScrollToTop);
