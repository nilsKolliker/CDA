using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using test.Data.Models;

namespace test.Data.Services
{
    public class MarquesServices
    {
        private readonly MyDbContext _context;

        public MarquesServices(MyDbContext context)
        {
            _context = context;
        }

        public void AddMarques(Marque marque)
        {
            if (marque == null)
            {
                throw new ArgumentNullException(nameof(marque));
            }
            _context.Marques.Add(marque);
            _context.SaveChanges();
        }
        public void DeleteMarques(Marque marque)
        {
            if (marque == null)
            {
                throw new ArgumentNullException(nameof(marque));
            }
            _context.Marques.Remove(marque);
            _context.SaveChanges();
        }
        public IEnumerable<Marque> GetAllMarques()
        {
            return _context.Marques.ToList();
        }
        public Marque GetMarqueById(int id)
        {
            return _context.Marques.FirstOrDefault(marque => marque.MarId == id);
        }
        public void UpdateMarque(Marque marque)
        {
            _context.SaveChanges();
        }
    }
}
