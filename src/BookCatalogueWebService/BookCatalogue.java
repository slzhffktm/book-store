package BookCatalogueWebService;

import org.json.JSONObject;

import javax.jws.WebMethod;
import javax.jws.WebService;

@WebService()
public interface BookCatalogue {

    @WebMethod
    JSONObject searchBook(String id) throws Exception;

    @WebMethod
    JSONObject getBookDetail(String bookId) throws Exception;

}
