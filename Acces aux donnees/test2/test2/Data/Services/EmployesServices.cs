using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using test2.Data.Models;

namespace test2.Data.Services
{
    public class EmployesServices
    {
        private readonly MyDbContext _context;

        public EmployesServices(MyDbContext context)
        {
            _context = context;
        }

        public void Add(Employe employe)
        {
            if (employe==null)
            {
                throw new ArgumentNullException(nameof(employe));
            }
            _context.Employes.Add(employe);
            _context.SaveChanges();
        }

        public void Delete(Employe employe)
        {
            if (employe == null)
            {
                throw new ArgumentNullException(nameof(employe));
            }
            _context.Employes.Remove(employe);
            _context.SaveChanges();
        }

        public IEnumerable<Employe> GetAll()
        {
            return _context.Employes.ToList();
        }

        public Employe GetById(int id)
        {
            return _context.Employes.FirstOrDefault(employe => employe.Noemp == id);
        }

        public void Update()
        {
            _context.SaveChanges();
        }
    }
}
