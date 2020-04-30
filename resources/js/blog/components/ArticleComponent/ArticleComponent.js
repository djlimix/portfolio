import React from 'react';

import style from './ArticleComponent.css'
import {Link} from "react-router-dom";

const ArticleComponent = ({ url, dateTime, dateTimeText, bg, title }) => {

	return (
		<>
            <Link className={style.article} to={url}>
                <time className={style.time} dateTime={dateTime}>{dateTimeText}</time>
                <img src={bg} alt={title}/>
                <span className={style.title}>{title}</span>
            </Link>
        </>
	);

};

export default ArticleComponent;
