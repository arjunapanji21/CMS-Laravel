import 'flowbite';
import axios from 'axios';
import $ from 'jquery';
import { DataTable } from "simple-datatables";
import 'summernote/dist/summernote-lite.min.css';
import 'summernote/dist/summernote-lite.min.js';
import ApexCharts from 'apexcharts';

window.$ = $;
window.jQuery = $;
window.ApexCharts = ApexCharts;

// Set Axios default headers
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.baseURL = '/'; // Optional: Base URL for your API
const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
axios.defaults.headers.common['X-CSRF-TOKEN'] = token;

// Initialize a DataTable
document.addEventListener("DOMContentLoaded", function () {
    const table = document.querySelector("#dataTable");
    if (table) {
        new DataTable(table, {
            searchable: true,
            sortable: true
        });
    }
});

// Initialize Summernote (example)
document.addEventListener('DOMContentLoaded', function () {
    $('#summernote').summernote({
        placeholder: 'Tulis sesuatu...',
        tabsize: 2,
        height: 300, // Height of the editor
        toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link', 'picture', 'video']],
        ['view', ['fullscreen', 'codeview', 'help']]
    ]
    });
});