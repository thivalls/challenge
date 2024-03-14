type FileUploaderProps = {
  onChange: (event: React.ChangeEvent<HTMLInputElement>) => void;
  file: File | null;
};
const FileUploader = ({ onChange, file }: FileUploaderProps) => {
  return (
    <div className="flex flex-col gap-6">
      <div>
        <label htmlFor="file" className="sr-only">
          Choose a file
        </label>
        <input
          id="file"
          type="file"
          accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel,text/csv,application/json"
          onChange={onChange}
        />
      </div>
      {file && (
        <section>
          <p className="pb-6">File details:</p>
          <ul>
            <li>Name: {file.name}</li>
            <li>Type: {file.type}</li>
            <li>Size: {file.size} bytes</li>
          </ul>
        </section>
      )}

      {file && (
        <button className="rounded-lg bg-green-800 text-white px-4 py-2 border-none font-semibold">
          Upload the file
        </button>
      )}
    </div>
  );
};

export { FileUploader };
