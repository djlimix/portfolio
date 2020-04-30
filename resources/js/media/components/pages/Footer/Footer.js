import React from 'react';
import {NavLink} from 'react-router-dom';

import style from './Footer.css'

const Footer = () => {

    const year = new Date().getFullYear();

	return (
		<footer className={style.footer}>
			<p>&copy; {year} <NavLink to="/">LiMix Media</NavLink></p>
		</footer>
	);

};

export default Footer;
