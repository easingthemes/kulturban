import { injectReducer } from '../../store/reducers';
//import {reducer as formReducer} from 'redux-form';

export default (store) => ({
	path: 'blogw/:postId',
	getComponent (nextState, cb) {
		require.ensure([], (require) => {
			const PostRoute = require('./containers/BlogItemPageContainer').default
			const reducer = require('./reducers/index').default;

			injectReducer(store, { key: 'post', reducer });
			//injectReducer(store, { key: 'form', reducer });
			//injectReducer(store, { key: 'form', formReducer });

			cb(null, PostRoute)
		}, 'PostRoute')
	}
})
