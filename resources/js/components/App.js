import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class App extends Component {
    render() {
        return (
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header">BELAJAR ReactJS 5.7</div>
                            <div className="card-body">
                                SELAMAT DATANG DI MEGONO CODING
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
ReactDOM.render(<App />, document.getElementById('root'));