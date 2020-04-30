import React from 'react';
import style from './ProgressBar.css'
import ReactTooltip from 'react-tooltip';

const getLangPercentage = lang => {
    switch (lang) {
        case 'PHP':
            return '80%';
        case 'MySQL':
            return '60%';
        case 'Laravel':
            return '85%';
        case 'React':
            return '20%';
        case 'HTML':
            return '90%';
        case 'CSS':
            return '70%';
        case 'English':
            return 'C1';
    }
};

const ProgressBar = (props) => {
    // lang to variable for better look
    const lang = (props.lang).toString().toLowerCase();
    const addition = (props.lang === 'English') ? (
        <p>*C1 level according to Cambridge University</p>
    ) : '';

    return (
        <div>
            <div className={style.div}>
                <h3>{props.lang}</h3>
                <div className={`${style.progressBar} ${style[lang]}`} data-tip data-for={lang} />
                {addition}
            </div>
            <ReactTooltip type='light' effect='solid' id={lang}>
                <span>{getLangPercentage(props.lang)}</span>
            </ReactTooltip>
        </div>
    );
};

export default ProgressBar;
