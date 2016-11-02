const getMediaData = (id, successCallback, errorCallback) => {
	$.ajax({
		url: Constants.apiUrl + 'media/' + id,
		crossDomain: true
	})
		.done((data) => {
			const alt = data.alt_text || '';
			const title = data.title || {};
			const media = {
				title: title.rendered,
				description: data.description,
				platform: data.caption,
				tags: alt.split(','),
				src: data.source_url
			};
			successCallback(media);
		})
		.fail((xhr) => {
			errorCallback(xhr);
		});
};

export default getMediaData;
