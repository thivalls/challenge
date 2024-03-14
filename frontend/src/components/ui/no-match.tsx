import { ReactElement, useState } from "react";
import { FileUploader } from ".";
import DataTable from "../table-list";

function NoMatch(): ReactElement {
  const [selectedFile, setSelectedFile] = useState<File | null>(null);

  const handleFileChange = (event: React.ChangeEvent<HTMLInputElement>) => {
    const fileList = event.target.files;
    if (fileList && fileList.length > 0) {
      setSelectedFile(fileList[0]);
    } else {
      setSelectedFile(null);
    }
  };

  async function sendFile(file: File): Promise<void> {
    const formData = new FormData();
    formData.append("user_id", "4545");
    formData.append("billing_list", file);

    // URL DA API
    return fetch("http://localhost/api/billings/upload/native", {
      method: "POST",
      body: formData,
      headers: {
        Accept: "application/json",
      },
    })
      .then(async (response) => {
        if (!response.ok) {
          throw new Error("Error sending file.");
        }
      })
      .catch((error) => {
        console.error("Error:", error.message);
      });
  }

  const handleOnSubmit = (event: React.FormEvent<HTMLFormElement>) => {
    event.preventDefault();
    const form = event.target as HTMLFormElement;
    const fileInput = form.querySelector(
      'input[type="file"]'
    ) as HTMLInputElement;

    if (!fileInput) return;

    if (!fileInput.files) return;

    const file = fileInput.files[0];
    console.log("Valor do arquivo:", file);

    console.log("submit");

    sendFile(file);
    return;
  };

  return (
    <div className="h-screen w-screen bg-zinc-800 text-white gap-6 flex flex-1 flex-col items-center justify-center">
      <form onSubmit={handleOnSubmit}>
        <FileUploader onChange={handleFileChange} file={selectedFile} />
      </form>
      <div>
        <DataTable />
      </div>
    </div>
  );
}

export { NoMatch };
