import React from 'react';
import LoaderImage from '../images/puff.svg';
/* eslint-disable no-unused-vars */
import style from './style.global.scss';
/* eslint-enable no-unused-vars */

export class PageLoader extends React.Component {

	componentWillReceiveProps (nextProps) {
		if (nextProps.isLoaded) {
			$('.loader-item').delay(700).fadeOut();
			$('#pageloader').delay(800).fadeOut('slow');
		}
	}

	render () {
		return (
			<div id="pageloader">
				<div className="loader-item">
					<img
						src={LoaderImage}
						alt="page loader"
					/>
				</div>
			</div>
		);
	}
}

PageLoader.propTypes = {
	isLoaded: React.PropTypes.bool
};

export default PageLoader;
