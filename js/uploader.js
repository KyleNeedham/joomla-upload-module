/**
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

function initModUploader() {
    var uploaders = document.querySelectorAll('.mod-upload');

    function newProgressBar(appendTo) {
        var root = document.createElement('div');
        var bar = document.createElement('div');

        root.setAttribute('class', 'progress');
        bar.setAttribute('class', 'progress-bar');
        bar.setAttribute('role', 'progressbar');
        root.append(bar);
        appendTo.append(root);

        return function (newPercentage) {
            bar.style.width = Math.floor(newPercentage) + '%';
        };
    }

    function pluck(el, attr) {
        return el
            .querySelector('[' + attr + ']')
            .attributes
            .getNamedItem(attr)
            .value;
    }

    function extractAttributes(el) {
        var url = pluck(el, 'data-mod-upload-url');
        var fieldName = pluck(el, 'data-mod-upload-field-name');

        if (!url || !fieldName) {
            throw Error('Invalid configuration for mod_upload module.');
        }

        return {url: url, fieldName: fieldName};
    }

    function uploadFile(file, progressBar) {
        var req = new XMLHttpRequest({});
        var formData = new FormData();
        formData.append(this.fieldName, file);

        req.upload.addEventListener('progress', function(e) {
            var done = e.position || e.loaded, total = e.totalSize || e.total;
            progressBar(Math.floor(done/total*1000)/10);
        }, false);

        req.onreadystatechange = function(e) {
            if (4 === this.readyState) {
                progressBar(100);
            }
        };

        req.open('post', this.url, true);
        req.send(formData);
    }

    function onFileSelected(e) {
        var files = e.target.files;

        for (var i = 0; i < files.length; i++) {
            var el = document.createElement('div');
            var label = document.createElement('div');
            var progressBarContainer = document.createElement('div');

            el.setAttribute('class', 'mod-upload-file-container');
            label.setAttribute('class', 'mod-upload-file-label');
            progressBarContainer.setAttribute('class', 'mod-upload-file-progress');

            var progressBar = newProgressBar(progressBarContainer);

            label.innerHTML = files[i].name;
            el.append(label);
            el.append(progressBarContainer);

            e.target.parentElement.append(el);

            uploadFile.call(this, files[0], progressBar);
        }
    }

    function createUploadField(url, fieldName) {
        var el = document.createElement('input');
        var inputType = document.createAttribute('type');
        var inputName = document.createAttribute('name');

        inputType.value = 'file';
        inputName.value = fieldName;

        el.attributes.setNamedItem(inputType);
        el.attributes.setNamedItem(inputName);

        return el;
    }

    function appendNewFile(container, attr) {
        var field = createUploadField(attr.url, attr.fieldName);
        field.addEventListener('change', onFileSelected.bind(attr));
        container.append(field);
    }

    function render(el) {
        appendNewFile(
            el.querySelector('.mod-upload-file-inputs'),
            extractAttributes(el)
        );
    }

    uploaders.forEach(render);
}

window.addEventListener('load', initModUploader);
