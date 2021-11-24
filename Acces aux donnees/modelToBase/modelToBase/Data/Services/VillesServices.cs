using modelToBase.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace modelToBase.Data.Services
{
    public class VillesServices
    {
        private readonly myDbContext _context;

        public VillesServices(myDbContext context)
        {
            _context = context;
        }

        public void AddVille(Ville obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Villes.Add(obj);
            _context.SaveChanges();
        }

        public void DeleteVille(Ville obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Villes.Remove(obj);
            _context.SaveChanges();
        }

        public IEnumerable<Ville> GetAllVilles()
        {
            return _context.Villes.ToList();
        }

        public Ville GetVilleById(int id)
        {
            return _context.Villes.FirstOrDefault(obj => obj.IdVille == id);
        }

        public void UpdateVille(Ville obj)
        {
            _context.SaveChanges();
        }
    }
}
