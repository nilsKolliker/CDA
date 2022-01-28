using crudTextCsharp.Data.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace crudTextCsharp.Data.Services
{
    public class UtilisateursService
    {

        private readonly MyDbContext _context;

        public UtilisateursService(MyDbContext context)
        {
            _context = context;
        }

        public void AddUtilisateur(Utilisateur obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Utilisateurs.Add(obj);
            _context.SaveChanges();
        }

        public void DeleteUtilisateur(Utilisateur obj)
        {
            if (obj == null)
            {
                throw new ArgumentNullException(nameof(obj));
            }
            _context.Utilisateurs.Remove(obj);
            _context.SaveChanges();
        }

        public IEnumerable<Utilisateur> GetAllUtilisateurs()
        {
            return _context.Utilisateurs.ToList();
        }

        public Utilisateur GetUtilisateurById(int id)
        {
            return _context.Utilisateurs.FirstOrDefault(obj => obj.IdUtilisateur == id);
        }

        public void UpdateUtilisateur(Utilisateur obj)
        {
            _context.Update(obj);
            _context.SaveChanges();
        }


    }
}
