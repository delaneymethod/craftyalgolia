<?php
/*
 * Config scout.php
 *
 * This file exists only as a template for the Scout settings.
 * It does nothing on its own.
 *
 * Don't edit this file, instead copy it to 'craft/config' as 'scout.php'
 * and make your changes there to override default settings.
 *
 * Once copied to 'craft/config', this file will be multi-environment aware as
 * well, so you can have different settings groups for each environment, just as
 * you do for 'general.php'
 */

use craft\elements\Entry;
use rias\scout\ScoutIndex;
use craft\elements\db\EntryQuery;
use modules\delaneymethod\craftyalgolia\CraftyAlgolia;

return [
	// Global settings
	'*' => [
    /*
     * Scout listens to numerous Element events to keep them updated in
     * their respective indices. You can disable these and update
     * your indices manually using the commands.
     */
    'sync' => true,

    /*
     * By default Scout handles all indexing in a queued job, you can disable
     * this so the indices are updated as soon as the elements are updated
     */
    'queue' => true,

    /*
     * The connection timeout (in seconds), increase this only if necessary
     */
    'connect_timeout' => 1,

    /*
     * The batch size Scout uses when importing a large amount of elements
     */
    'batch_size' => 1000,

    /*
     * The Algolia Application ID, this id can be found in your Algolia Account
     * https://www.algolia.com/api-keys. This id is used to update records.
     */
    'application_id' => '$ALGOLIA_APPLICATION_ID',

    /*
     * The Algolia Admin API key, this key can be found in your Algolia Account
     * https://www.algolia.com/api-keys. This key is used to update records.
     */
    'admin_api_key'  => '$ALGOLIA_ADMIN_API_KEY',

    /*
     * The Algolia search API key, this key can be found in your Algolia Account
     * https://www.algolia.com/api-keys. This search key is not used in Scout
     * but can be used through the Scout variable in your template files.
     */
    'search_api_key' => '$ALGOLIA_SEARCH_API_KEY', //optional

    /*
     * A collection of indices that Scout should sync to, these can be configured
     * by using the \rias\scout\ScoutIndex::create('IndexName') command. Each
     * index should define an ElementType, criteria and a transformer.
     */
    'indices'       => [],
	],

	// Dev environment settings
	'dev' => [
		'indices' => [
			ScoutIndex::create('dev_videos')
				->elementType(Entry::class)
				->criteria(function(EntryQuery $query) {
					return $query->section('videos');
				})
				->transformer(function(Entry $entry) {
					return CraftyAlgolia::$instance->craftyAlgoliaService->transformVideoData($entry);
				}),
		],
	],

	// Staging environment settings
	'staging' => [],

	// Production environment settings
	'production' => [],
];
