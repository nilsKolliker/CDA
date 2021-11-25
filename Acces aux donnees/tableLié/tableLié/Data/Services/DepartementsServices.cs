using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using tableLié.Data.Models;

namespace tableLié.Data.Services
{
    public class DepartementsServices
    {
        private readonly MyDbContext _context;

        public DepartementsServices(MyDbContext context)
        {
            _context = context;
        }

        public void AddDepartement(Departement obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Departement.Add(obj);
            _context.SaveChanges();
        }

        public void DeleteDepartement(Departement obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Departement.Remove(obj);
            _context.SaveChanges();
        }

        public IEnumerable<Departement> GetAllDepartements()
        {
            return _context.Departement.ToList();
        }

        public Departement GetDepartementById(int id)
        {
            return _context.Departement.FirstOrDefault(obj => obj.IdDepartement == id);
        }

        public Departement GetDepartementByLibelle(string libelle)
        {
            return _context.Departement.FirstOrDefault(obj => obj.Libelle == libelle);
        }

        public void UpdateDepartement(Departement obj)
        {
            _context.SaveChanges();
        }
    }
}
