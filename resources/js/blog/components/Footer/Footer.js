import React from 'react';

import style from './Footer.css'

const Footer = () => {

    const year = new Date().getFullYear();

	return (
		<footer className={style.footer}>
            <p>
                &copy; {year} Made by <a href="//limix.eu" target="_blank" rel="noopener norefferer">LiMix Media</a>
            </p>
		</footer>
	);

};

export default Footer;
