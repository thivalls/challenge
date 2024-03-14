import { useState, useEffect } from "react";
import {
  Table,
  TableHeader,
  TableBody,
  TableRow,
  TableHead,
  TableCell,
  TableFooter,
} from "../ui";

interface ItemInterface {
  id: string;
  created_at: string;
  file_name: string;
}

interface LaravelResourceMeta {
  current_page: number;
  last_page: number;
  total: number;
}

interface ChargeApiResult {
  data: ItemInterface[];
  meta: LaravelResourceMeta;
}

const DataTable = () => {
  const [currentPage, setCurrentPage] = useState(1);
  const [charges, setCharges] = useState<ChargeApiResult>(() =>
    Object.assign({} as ChargeApiResult)
  );

  useEffect(() => {
    getChargeResults(currentPage);
  }, [currentPage]);

  const getChargeResults = (page: number) => {
    if (page === 0) page = 1;
    const url = `http://localhost/api/charges?page=${page}`;
    fetch(url)
      .then((response) => response.json())
      .then((charges) => {
        setCharges(charges);
      })
      .catch((error) => {
        console.error("Erro na requisição:", error);
      });
  };

  const results: ChargeApiResult = charges;

  if (!results.data) return;

  return (
    <>
      <Table className="min-w-full divide-y divide-gray-200 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
        <TableHeader>
          <TableRow>
            <TableHead>ID</TableHead>
            <TableHead>Data</TableHead>
            <TableHead>Arquivo</TableHead>
          </TableRow>
        </TableHeader>
        <TableBody>
          {results.data.map((item) => (
            <TableRow key={item.id}>
              <TableCell>{item.id}</TableCell>
              <TableCell>{item.created_at}</TableCell>
              <TableCell>{item.file_name}</TableCell>
            </TableRow>
          ))}
        </TableBody>
        <TableFooter>
          <TableRow>
            <TableCell colSpan={3}>Total de registros</TableCell>
            <TableCell>{results.meta.total}</TableCell>
          </TableRow>
        </TableFooter>
      </Table>
      <div className="flex w-full justify-between items-center mt-4">
        <button
          onClick={() => {
            if (currentPage != 1) setCurrentPage(currentPage - 1);
          }}
          disabled={currentPage == 1}
          className="p-2 bg-gray-300 text-gray-600 disabled:text-gray-400 disabled:bg-gray-200"
        >
          Anterior
        </button>
        <span>
          Página {currentPage} de {results.meta.last_page}
        </span>
        <button
          onClick={() => {
            if (results.meta.current_page < results.meta.last_page)
              setCurrentPage(currentPage + 1);
          }}
          disabled={results.meta.current_page == results.meta.last_page}
          className="p-2 bg-gray-300 text-gray-600 disabled:text-gray-400 disabled:bg-gray-200"
        >
          Próximo
        </button>
      </div>
    </>
  );
};

export default DataTable;
