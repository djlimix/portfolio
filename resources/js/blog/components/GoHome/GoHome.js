import React from 'react';
import {Helmet} from 'react-helmet';

import style from './GoHome.css'
import {Link} from "react-router-dom";
import {FontAwesomeIcon} from "@fortawesome/react-fontawesome";
import {faArrowLeft} from "@fortawesome/free-solid-svg-icons";

const GoHome = () => {

	return (
		<>
            <Link to="/" className={style.goHome}>
                <FontAwesomeIcon icon={faArrowLeft} /> Home
            </Link>
        </>
	);

};

export default GoHome;
