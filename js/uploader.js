/**
 * (c) 2017 WebOD LTD
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

function initModUploader() {
    var uploaders = document.querySelectorAll('[data-mod-upload]');

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

    function extractAttributes(input) {
        var url = input.getAttribute('data-mod-upload-url');
        var fieldName = input.name;

        if (!url || !fieldName) {
            throw Error('Invalid configuration for mod_upload module.');
        }

        return {url: url, fieldName: fieldName};
    }

    function uploadFile(file, attributes, progressBar) {
        var req = new XMLHttpRequest({});
        var formData = new FormData();
        formData.append(attributes.fieldName, file);

        req.upload.addEventListener('progress', function(e) {
            var done = e.position || e.loaded, total = e.totalSize || e.total;
            progressBar(Math.floor(done/total*1000)/10);
        }, false);

        req.onreadystatechange = function(e) {
            if (4 === this.readyState) {
                progressBar(100);
            }
        };

        req.open('post', attributes.url, true);
        req.send(formData);
    }

    function onFileSelected(el, input) {
        return function(e) {
          var files = e.target.files;

          for (var i = 0; i < files.length; i++) {
            var uploadContainer = document.createElement('div');
            var label = document.createElement('div');
            var progressBarContainer = document.createElement('div');

            uploadContainer.className = 'mod-upload-file-container';
            label.className = 'mod-upload-file-label';
            progressBarContainer.className = 'mod-upload-file-progress';

            var progressBar = newProgressBar(progressBarContainer);

            label.innerHTML = files[i].name;
            uploadContainer.append(label);
            uploadContainer.append(progressBarContainer);

            el.querySelector('[data-mod-progress]').append(uploadContainer);
            uploadFile(files[i], extractAttributes(input), progressBar);
          }
        }
    }

    function render(el) {
      var input = el.querySelector('[data-mod-input]');
      input.addEventListener('change', onFileSelected(el, input));
    }

    uploaders.forEach(render);
}

window.addEventListener('load', initModUploader);
