console.log('Additional is running...');

const PROTOCOL = window.location.protocol
const HOST = window.location.host
const PATH = HOST === 'localhost' ? 'scm_dominos/' : ''
const BASE_URL = `${PROTOCOL}//${HOST}/${PATH}`
const TOKEN = sessionStorage.getItem('INT-TOKEN')
// const TOKEN_EXT = JSON.parse(localStorage.getItem('TOKEN_EXT'))
const DATA_EXT = JSON.parse(localStorage.getItem('DATA_EXT'))
const USERNAME = 'scm-webapp'
const PASSWORD = 'codemaniacindo'

var makeNotif = (icon, heading, text, position) => {
	$.toast({
		heading: heading,
		text: text,
		position: position,
		loaderBg: '#ff6849',
		icon: icon,
		hideAfter: 3500,
		stack: 1
	});
}
