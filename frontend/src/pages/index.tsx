import { FileUploader } from "@/components";

const Home = () => {
  const sendFile = () => {
    console.log("funcionei");
    return "";
  };

  return (
    <div>
      <div className="w-full bg-red">
        <h2>teste</h2>
        <form action={() => sendFile}>
          <FileUploader file={[]} />
          <button type="submit">Enviar</button>
        </form>
      </div>
    </div>
  );
};

export default Home;
