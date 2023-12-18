import './bootstrap';
import 'flowbite';


document.addEventListener('DOMContentLoaded', () => {
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

    // Initialise le mode sombre en fonction des paramètres locaux ou du système
    if (localStorage.getItem('color-theme') === 'dark' || (!localStorage.getItem('color-theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
        themeToggleLightIcon.classList.remove('hidden');
        themeToggleDarkIcon.classList.add('hidden');
    } else {
        themeToggleLightIcon.classList.add('hidden');
        themeToggleDarkIcon.classList.remove('hidden');
    }

    themeToggleBtn.addEventListener('click', () => {
        document.documentElement.classList.toggle('dark');
        themeToggleDarkIcon.classList.toggle('hidden');
        themeToggleLightIcon.classList.toggle('hidden');

        let theme = document.documentElement.classList.contains('dark') ? 'dark' : 'light';
        localStorage.setItem('color-theme', theme);
    });
});

// Learn more about the Tabs API here: https://flowbite.com/docs/components/tabs/#javascript-behaviour

const tabElements = [
    {
        id: 'ios',
        triggerEl: document.querySelector('#ios-tab'),
        targetEl: document.querySelector('#ios')
    },
    {
        id: 'android',
        triggerEl: document.querySelector('#android-tab'),
        targetEl: document.querySelector('#android')
    }
];

// options with default values
const options = {
    defaultTabId: 'ios',
    onShow: () => {
        console.log('tab is shown');
    }
};

const tabs = new Tabs(tabElements, options);

tabs.show('ios');