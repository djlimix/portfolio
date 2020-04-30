import React from 'react';

import style from './JuniorInternet.css'

const JuniorInternet = (props) => {
    const type = props.won;
    let text = '';

    if (type === "3rd") {
        text = (<h2>
            This website won 3rd place in <a href="https://juniorinternet.sk" target="_blank" rel="noopener norefferer">JuniorInternet 2017 competition</a>.
        </h2>);
    } else {
        text = (
            <h2>
                This website won the dean's price in <a href="https://juniorinternet.sk" target="_blank" rel="noopener norefferer">JuniorInternet 2018 competition</a>.
            </h2>
        );
    }

	return (
		<div className={style.ji}>
            {text}
		</div>
	);

};

export default JuniorInternet;
