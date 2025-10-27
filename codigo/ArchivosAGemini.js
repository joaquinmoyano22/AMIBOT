import { 
    GoogleGenAI,
} from "@google/genai";


// El cliente obtiene la API key de la variable de entorno `GEMINI_API_KEY`.
const ia = new GoogleGenAI({});

// Como listar todos los modelos de ia que ofrece google
//console.log(await ia.models.list());

const nombre_archivo1 = "AdS-U1.pdf";
const nombre_archivo2 = "AdS-U2-1.pdf";

const path_archivo1 = "../documentos_de_prueba/AdS-U1.pdf";
const path_archivo2 = "../documentos_de_prueba/AdS-U2-1.pdf";

const tipo_archivo = "application/pdf";

const materia_curso = "ArquitecturaDeSistemas";

//Subir un archivo, que solo sube archivos de manera estatica por ahora
async function SubirArchivo(path_archivo, nombre_archivo, materia_curso){
    const archivo = await ia.files.upload({
        file: path_archivo,
        config: {
            displayName: `[${materia_curso}] ${nombre_archivo}`,
        },
    });
}

async function ListarTodosLosArchivosSubidos(){
    const lista_archivos = await ia.files.list({ config: { pageSize: 10 } });
    for await (const archivo of lista_archivos) {
        const archivo_traido = await ia.files.get({name: archivo.name});
        console.log(archivo_traido);
    }
}

async function BorrarTodosLosArchivosSubidos(){
    const lista_archivos = await ia.files.list({ config: { pageSize: 10 } });
    for await (const archivo of lista_archivos) {
        ia.files.delete({name: archivo.name})
    }
}

//Ejemplo de como subir archivos

//await SubirArchivo(path_archivo1, nombre_archivo1, "ArquitecturaDeSistemas");
//await SubirArchivo(path_archivo2, nombre_archivo2, "ArquitecturaDeSistemas");
ListarTodosLosArchivosSubidos();

