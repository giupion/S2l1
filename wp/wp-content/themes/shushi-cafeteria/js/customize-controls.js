( function( api ) {

	// Extends our custom "shushi-cafeteria" section.
	api.sectionConstructor['shushi-cafeteria'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );