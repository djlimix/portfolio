import React, {Component} from 'react';

import style from './Contact.css'

import Footer from "../Footer/Footer";
import SEO from "../../../../SEO/SEO";

class Contact extends Component {
    constructor(props) {
        super(props);
        this.state = {};
        this.changeFormData = this.changeFormData.bind(this);
        this.submitEmail = this.submitEmail.bind(this);
    }

    submitEmail(e) {
        e.preventDefault();
        this.setState({sending: true})

        fetch('/api/contact', {
            method: 'POST',
            headers: {'Content-Type':'application/x-www-form-urlencoded'},
            body: new URLSearchParams(this.state)
        })
        .then(response => response.json())
        .then(json => {
            this.setState({response: json, sending: false})
            if (json.error === false) {
                document.querySelectorAll('input').forEach(input => {
                    input.value = '';
                });
                document.querySelector('textarea').value = '';
            }
        });

        return false;
    }

    changeFormData(e) {
        let name = e.target.name,
            val  = e.target.value;
        this.setState({[name]: val});
    }

    render() {
        let error_msg = '';
        if (this.state.response !== undefined) {
            if (this.state.response.error === true) {
                error_msg = (
                    <div className={style.alert + ' ' + style.alertDanger}>
                        {this.state.response.msg}
                    </div>
                )
            } else {
                error_msg = (
                    <div className={style.alert + ' ' + style.alertSuccess}>
                        {this.state.response.msg}
                    </div>
                )
            }
        }
        if (this.state.sending === true) {
            error_msg = (
                <div className={style.alert + ' ' + style.alertInfo}>
                    Sending email, please wait...
                </div>
            )
        }

        return (
            <div className={style.contact}>
                <SEO title="Contact / DJ LiMix" description="If you want to have the best party, be quick! You can contact me only here." canonical="https://dj.limix.eu/contact" />
                <div className={style.img}>
                    <img src="/dj/img/contact.gif" alt=""/>
                </div>
                <div className={style.right}>
                    <h1>Contact me</h1>
                    <form action="/api/contact" id="form" onSubmit={this.submitEmail} method="POST">
                        {error_msg}
                        <input type="text" placeholder="Name" name="name" required onChange={this.changeFormData} />
                        <input type="email" placeholder="Email" name="email" required onChange={this.changeFormData}/>
                        <textarea name="message" cols="30" rows="8" placeholder="Message" required onChange={this.changeFormData}/>
                        <div className={style.captcha}>
                            <button type="submit">Send message</button>
                        </div>
                    </form>
                </div>
                <Footer />
            </div>
        )
    }

}

export default Contact;
