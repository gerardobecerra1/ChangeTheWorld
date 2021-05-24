$(document).ready(function () {

    const submitBtn = document.getElementById("submitBtn");
    const inputName = document.querySelector("#name");
    const inputCurso = document.querySelector("#curso");

    const capitalize = (str, lower = false) =>
        (lower ? str.toLowerCase() : str).replace(/(?:^|\s|["'([{])+\S/g, (match) =>
            match.toUpperCase()
        );

    if (submitBtn) {
        submitBtn.addEventListener("click", () => {
            const val = capitalize(inputName.value);
            generatePDF(val, "Change The World", inputCurso.value);
        });
    }

    const generatePDF = async (name, firma, curso) => {
        const {
            PDFDocument,
            rgb
        } = PDFLib;

        const exBytes = await fetch("http://localhost/CTW/public/js/certiV2.pdf").then((res) => {
            return res.arrayBuffer();
        });

        const exFont = await fetch("http://localhost/CTW/public/js/DancingScript-Regular.ttf").then((res) => {
            return res.arrayBuffer();
        });

        const pdfDoc = await PDFDocument.load(exBytes);

        pdfDoc.registerFontkit(fontkit);
        const myfont = await pdfDoc.embedFont(exFont);
        const pages = pdfDoc.getPages();

        const drawName = pages[0];
        drawName.drawText(name, {
            x: 30,
            y: 320,
            size: 32,
            font: myfont,
            color: rgb(0, 0, 0),
        });

        const drawCurso = pages[0];
        drawCurso.drawText(curso, {
            x: 70,
            y: 185,
            size: 20,
            font: myfont,
            color: rgb(0, 0, 0),
        });

        const drawFirma = pages[0];
        drawFirma.drawText(firma, {
            x: 325,
            y: 185,
            size: 20,
            font: myfont,
            color: rgb(0, 0, 0),
        });

        const uri = await pdfDoc.saveAsBase64({
            dataUri: true
        });
        saveAs(uri, "CertificadoNuevo.pdf", {
            autoBom: true
        });
        document.querySelector("#mypdf").src = uri;
    };

    $(".form-questions").submit(function (e) {
        e.preventDefault();

        if ($("#commentCourse").val() != "" && $("#rating").val() != "") {

        } else {
            Swal.fire({
                title: 'Empty Requirements!',
                text: 'Enter all requeriments',
                icon: 'error',
                confirmButtonText: 'Retry'
            })
        }
    });

});