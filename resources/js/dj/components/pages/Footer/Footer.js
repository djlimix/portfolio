import React from 'react';
import {NavLink} from 'react-router-dom';

import shared from '../../../../media/components/pages/Footer/Footer.css'
import style from './Footer.css'
import classNames from 'classnames';

const Footer = () => {

    const year = new Date().getFullYear();

	return (
		<footer className={classNames(style.footer,shared.footer)}>
			<p>&copy; {year} <NavLink to="/">DJ LiMix</NavLink></p>
		</footer>
	);

};

export default Footer;
