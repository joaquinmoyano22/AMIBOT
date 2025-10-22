   const toggle = document.getElementById("chatbot-toggle");
   const box = document.getElementById("chatbot-box");
   const close = document.getElementById("close-chat");
   //    const send = document.getElementById("send-chat");
   const input = document.getElementById("chatbot-input");
   const boton = document.getElementById("consultarGeminis");

   const messages = document.getElementById("chatbot-messages");

   toggle.addEventListener("click", () => {
       box.classList.toggle("active");
   });



   input.addEventListener("keypress", e => {
       if (e.key === "Enter") boton.click();
   });


   boton.addEventListener("click", () => {
       const mensaje = input.value.trim();
       if (!mensaje) return;
       consultarGeminis(mensaje);
       input.value = "";
   });

   // también permitir Enter
   input.addEventListener("keypress", e => {
       if (e.key === "Enter") boton.click();
   });

   async function consultarGeminis(preguntonta) {
       console.log("Consultando Gemini con:", preguntonta);

       const API_KEY = "AIzaSyC1r4kzO3JAnbOose1OFkCS_bNGZ6CEDJg";
       const url = `https://generativelanguage.googleapis.com/v1/models/gemini-2.5-pro:generateContent?key=${API_KEY}`;

       const requestBody = {
           contents: [{ parts: [{ text: preguntonta }] }],
           generationConfig: { temperature: 0.4, maxOutputTokens: 32768 }
       };

       try {
           const resp = await fetch(url, {
               method: "POST",
               headers: { "Content-Type": "application/json" },
               body: JSON.stringify(requestBody)
           });

           const json = await resp.json();

           const parts =
               json &&
               json.candidates &&
               json.candidates[0] &&
               json.candidates[0].content &&
               json.candidates[0].content.parts;

           if (!parts || !parts.length) {
               console.log("No hubo respuesta");
               return;
           }

           const texto = parts.map(p => p.text || "").join("\n");
           console.log("Respuesta de Gemini:", texto);

       } catch (error) {
           console.error("Error al consultar Gemini:", error);
       }
   }