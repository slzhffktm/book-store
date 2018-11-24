package BookCatalogueWebService;

import javax.jws.WebMethod;
import javax.jws.WebService;
import javax.xml.soap.SOAPMessage;

@WebService()
public interface BookCatalogue {

    @WebMethod
    String searchBook(String id) throws Exception;

    @WebMethod
    SOAPMessage searchBookSOAP(String title)throws Exception;

    @WebMethod
    String getBookDetail(String bookId) throws Exception;

    @WebMethod
    boolean buyBook(String id, String card, int total) throws Exception;

    @WebMethod
    String getRecommendation(String[] genres);
}
