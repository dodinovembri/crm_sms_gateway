<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'AuthController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// routes for auth
$route['login'] = 'AuthController';
$route['auth/login'] = 'AuthController/login';
$route['home'] = 'HomeController';
$route['logout'] = 'HomeController/logout';

// routes for user
$route['user'] = 'UserController';
$route['user/create'] = 'UserController/create';
$route['user/store'] = 'UserController/store';
$route['user/edit/(:any)'] = 'UserController/edit/$1';
$route['user/show/(:any)'] = 'UserController/show/$1';
$route['user/update/(:any)'] = 'UserController/update/$1';
$route['user/destroy/(:any)'] = 'UserController/destroy/$1';

// routes for profile
$route['profile'] = 'ProfileController';
$route['profile/create'] = 'ProfileController/create';
$route['profile/store'] = 'ProfileController/store';
$route['profile/edit/(:any)'] = 'ProfileController/edit/$1';
$route['profile/show/(:any)'] = 'ProfileController/show/$1';
$route['profile/update/(:any)'] = 'ProfileController/update/$1';
$route['profile/destroy/(:any)'] = 'ProfileController/destroy/$1';

// routes for phone
$route['phone'] = 'PhoneController';
$route['phone/create'] = 'PhoneController/create';
$route['phone/store'] = 'PhoneController/store';
$route['phone/edit/(:any)'] = 'PhoneController/edit/$1';
$route['phone/show/(:any)'] = 'PhoneController/show/$1';
$route['phone/update/(:any)'] = 'PhoneController/update/$1';
$route['phone/destroy/(:any)'] = 'PhoneController/destroy/$1';

// routes for single message
$route['single_message'] = 'SingleMessageController';
$route['single_message/create'] = 'SingleMessageController/create';
$route['single_message/store'] = 'SingleMessageController/store';
$route['single_message/edit/(:any)'] = 'SingleMessageController/edit/$1';
$route['single_message/show/(:any)'] = 'SingleMessageController/show/$1';
$route['single_message/update/(:any)'] = 'SingleMessageController/update/$1';
$route['single_message/destroy/(:any)'] = 'SingleMessageController/destroy/$1';

// routes for single message
$route['broadcast_message'] = 'BroadcastMessageController';
$route['broadcast_message/create'] = 'BroadcastMessageController/create';
$route['broadcast_message/store'] = 'BroadcastMessageController/store';
$route['broadcast_message/edit/(:any)'] = 'BroadcastMessageController/edit/$1';
$route['broadcast_message/show/(:any)'] = 'BroadcastMessageController/show/$1';
$route['broadcast_message/update/(:any)'] = 'BroadcastMessageController/update/$1';
$route['broadcast_message/destroy/(:any)'] = 'BroadcastMessageController/destroy/$1';

// routes for inbox
$route['inbox'] = 'InboxController';
$route['inbox/create'] = 'InboxController/create';
$route['inbox/store'] = 'InboxController/store';
$route['inbox/edit/(:any)'] = 'InboxController/edit/$1';
$route['inbox/show/(:any)'] = 'InboxController/show/$1';
$route['inbox/update/(:any)'] = 'InboxController/update/$1';
$route['inbox/destroy/(:any)'] = 'InboxController/destroy/$1';

// routes for single sentbox
$route['sentbox'] = 'SentboxController';
$route['sentbox/create'] = 'SentboxController/create';
$route['sentbox/store'] = 'SentboxController/store';
$route['sentbox/edit/(:any)'] = 'SentboxController/edit/$1';
$route['sentbox/show/(:any)'] = 'SentboxController/show/$1';
$route['sentbox/update/(:any)'] = 'SentboxController/update/$1';
$route['sentbox/destroy/(:any)'] = 'SentboxController/destroy/$1';

// routes for outbox
$route['outbox'] = 'OutboxController';
$route['outbox/create'] = 'OutboxController/create';
$route['outbox/store'] = 'OutboxController/store';
$route['outbox/edit/(:any)'] = 'OutboxController/edit/$1';
$route['outbox/show/(:any)'] = 'OutboxController/show/$1';
$route['outbox/update/(:any)'] = 'OutboxController/update/$1';
$route['outbox/destroy/(:any)'] = 'OutboxController/destroy/$1';

// routes for contact
$route['contact'] = 'ContactController';
$route['contact/create'] = 'ContactController/create';
$route['contact/store'] = 'ContactController/store';
$route['contact/edit/(:any)'] = 'ContactController/edit/$1';
$route['contact/show/(:any)'] = 'ContactController/show/$1';
$route['contact/update/(:any)'] = 'ContactController/update/$1';
$route['contact/destroy/(:any)'] = 'ContactController/destroy/$1';

// routes for contact group
$route['contact_group'] = 'ContactGroupController';
$route['contact_group/create'] = 'ContactGroupController/create';
$route['contact_group/store'] = 'ContactGroupController/store';
$route['contact_group/edit/(:any)'] = 'ContactGroupController/edit/$1';
$route['contact_group/show/(:any)'] = 'ContactGroupController/show/$1';
$route['contact_group/update/(:any)'] = 'ContactGroupController/update/$1';
$route['contact_group/destroy/(:any)'] = 'ContactGroupController/destroy/$1';

// routes for autoreply
$route['autoreply'] = 'AutoReplyController';
$route['autoreply/create'] = 'AutoReplyController/create';
$route['autoreply/store'] = 'AutoReplyController/store';
$route['autoreply/edit/(:any)'] = 'AutoReplyController/edit/$1';
$route['autoreply/show/(:any)'] = 'AutoReplyController/show/$1';
$route['autoreply/update/(:any)'] = 'AutoReplyController/update/$1';
$route['autoreply/destroy/(:any)'] = 'AutoReplyController/destroy/$1';

// routes for group
$route['group'] = 'GroupController';
$route['group/create'] = 'GroupController/create';
$route['group/store'] = 'GroupController/store';
$route['group/edit/(:any)'] = 'GroupController/edit/$1';
$route['group/show/(:any)'] = 'GroupController/show/$1';
$route['group/update/(:any)'] = 'GroupController/update/$1';
$route['group/destroy/(:any)'] = 'GroupController/destroy/$1';