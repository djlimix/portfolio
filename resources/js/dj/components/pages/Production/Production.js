import React, { useState, useEffect } from 'react';
import Pace from 'react-pace-progress'

import style from './Production.css'

import Footer from "../Footer/Footer";
import SEO from "../../../../SEO/SEO";

const Production = () => {
    const [production, setProduction] = useState({loading: true});

    useEffect(() => {
        const fetchProduction = async () => {
            const response = await fetch('/api/production');
            const json = await response.json();
            setProduction(json)
        };

        fetchProduction();
    }, []);

    let mashups = [];
    let mixes = [];
    for(let i in production) {
        const element = (<tr key={i}>
            <td>
                <a href={production[i].link} target="_blank" rel="noopener noreferrer">
                    {production[i].title}
                </a>
            </td>
            <td>
                {production[i].year}
            </td>
        </tr>);
        if (production[i].type === "mix") {
            mixes.push(element);
        } else {
            mashups.push(element);
        }
    }

	return (
		<div>
            <SEO title="My production / DJ LiMix" description="If you want to listen to mashups or sets created by DJ LiMix, you are in the right place." canonical="https://dj.limix.eu/production" />
            {production.loading === true ? <Pace color="#27ae60" height="10px"/> : (
                <div>
                    <div className={style.mashups}>
                        <h1>Mashups</h1>
                        <table className={style.table}>
                            <tbody>
                            {mashups}
                            </tbody>
                        </table>
                    </div>
                    <div className={style.mixes}>
                        <h1>Mixes</h1>
                        <table className={style.table}>
                            <tbody>
                            {mixes}
                            </tbody>
                        </table>
                    </div>
                </div>
            )}
            <Footer />
		</div>
	);

};

export default Production;
