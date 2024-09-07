<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Directory indexing</title>

    <style>

    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        display: flex;
        flex-direction: column;
        font-family: Arial, sans-serif;
    }

    #preview {
        height: 50%;
        border: 1px solid #ddd;
        width: 100%;
        box-sizing: border-box;
    }

    .editor-container {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        height: 50%;
        box-sizing: border-box;
    }

    .editor-panel {
        border: 1px solid #ddd;
        height: 100%;
    }

    </style>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="resource/script/custom.js"></script>

    <!-- Online code editor js [monaco-editor] -->
    <script src="https://cdn.jsdelivr.net/npm/monaco-editor@0.33.0/min/vs/loader.js"></script>

</head>
<body>
    <header>
        <h1></h1>
    </header>

    <div class='console-container'>
        <span id='maintextbanner'></span>
        <div class='console-underscore' id='console'>&#95;</div>
    </div>

    <div id="preview" class="preview-panel"></div>
    <div class="editor-container">
        <div id="html-editor" class="editor-panel"></div>
        <div id="css-editor" class="editor-panel"></div>
        <div id="js-editor" class="editor-panel"></div>
    </div>

    <footer>
        <p>&copy; 2024 bunbun. All rights reserved.</p>
    </footer>

    
    <script>
        
        // Initialize the Monaco Editor in your JavaScript:
        require.config({ paths: { 'vs': 'https://cdn.jsdelivr.net/npm/monaco-editor@0.33.0/min/vs' }});
        window.MonacoEnvironment = { getWorkerUrl: () => proxy };
        let proxy = URL.createObjectURL(new Blob([`
            self.MonacoEnvironment = { baseUrl: 'https://cdn.jsdelivr.net/npm/monaco-editor@0.33.0/min/' };
            importScripts('https://cdn.jsdelivr.net/npm/monaco-editor@0.33.0/min/vs/base/worker/workerMain.js');
        `], { type: 'text/javascript' }));

        
        // To create a live preview similar to CodePen, you can use an iframe to render the HTML, CSS, and JavaScript.
        // isten to changes in the editor and update the content in the iframe.
        require(["vs/editor/editor.main"], function () {
            const htmlEditor = monaco.editor.create(document.getElementById('html-editor'), {
                value: '<h1>Hello, World!</h1>',
                language: 'html'
            });

            const cssEditor = monaco.editor.create(document.getElementById('css-editor'), {
                value: 'body { font-family: Arial; }',
                language: 'css'
            });

            const jsEditor = monaco.editor.create(document.getElementById('js-editor'), {
                value: 'console.log("Hello, World!");',
                language: 'javascript'
            });

            function updatePreview() {
                const html = htmlEditor.getValue();
                const css = '<style>' + cssEditor.getValue() + '</style>';
                const js = '<script>' + jsEditor.getValue() + '<\/script>';
                const previewFrame = document.getElementById('preview');
                previewFrame.innerHTML = html + css + js;
            }

            htmlEditor.onDidChangeModelContent(updatePreview);
            cssEditor.onDidChangeModelContent(updatePreview);
            jsEditor.onDidChangeModelContent(updatePreview);

            updatePreview(); // Initialize the preview on load
        });

    </script>

</body>

</html>