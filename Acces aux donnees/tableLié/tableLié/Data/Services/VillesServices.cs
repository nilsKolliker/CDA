using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using tableLié.Data.Models;

namespace tableLié.Data.Services
{
    public class VillesServices
    {
        private readonly MyDbContext _context;
        public VillesServices(MyDbContext context)
        {
            _context = context;
        }

        public void AddVille(Ville obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Ville.Add(obj);
            _context.SaveChanges();
        }

        public void DeleteVille(Ville obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Ville.Remove(obj);
            _context.SaveChanges();
        }

        public IEnumerable<Ville> GetAllVilles()
        {
            IEnumerable<Ville> liste = (from e1 in _context.Ville 
                                        join e2 in _context.Departement
                                        on e1.IdDepartement equals e2.IdDepartement
                                        select new Ville
                                        {
                                            IdVille = e1.IdVille,
                                            Libelle = e1.Libelle,
                                            IdDepartement = e2.IdDepartement,
                                            Departement = e2
                                        }).ToList();
            return liste;
        }

        public Ville GetVilleById(int id)
        {
            Ville ville = (from e1 in _context.Ville
                                        join e2 in _context.Departement
                                        on e1.IdDepartement equals e2.IdDepartement
                                        select new Ville
                                        {
                                            IdVille = e1.IdVille,
                                            Libelle = e1.Libelle,
                                            IdDepartement = e2.IdDepartement,
                                            Departement = e2
                                        }).FirstOrDefault(obj => obj.IdVille == id);
            return ville;
        }

        public void UpdateVille(Ville obj)
        {
            _context.SaveChanges();
        }
    }
}
