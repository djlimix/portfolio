import React from 'react';
import {Helmet} from 'react-helmet';

const SEO = ({ title, description, canonical, img = null }) => {

	return (
		<Helmet>
			<title>{title}</title>
            <meta name="description" content={description} />
            <link rel="canonical" href={canonical} />

            {/* FB */}
            <meta property="og:url" content={canonical} />
            <meta property="og:type" content="website" />
            <meta property="og:title" content={title} />
            <meta property="og:description" content={description} />
            {img !== null ? <meta property="og:image" content={img} /> : null}

            {/* TWITTER */}
            <meta property="twitter:card" content="summary" />
            <meta property="twitter:creator" content="@limixmedia" />
            <meta property="twitter:title" content={title} />
            <meta property="twitter:description" content={description} />
            {img !== null ? <meta property="twitter:image" content={img} /> : null}
		</Helmet>
	);

};

export default SEO;
